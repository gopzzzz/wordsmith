document.addEventListener("DOMContentLoaded", () => {
    const articleCards = Array.from(document.querySelectorAll("#article-grid .post-card"));
    const filterButtons = Array.from(document.querySelectorAll(".filter-button"));
    const searchInput = document.getElementById("blog-search");
    const noResults = document.getElementById("no-results");
    const clearFiltersButton = document.getElementById("clear-filters");
    const resultsStatus = document.getElementById("results-status");
    let activeFilter = "all";

    const normalizeText = value => value.toLowerCase().trim();

    const updateArticles = () => {
        if (!articleCards.length) return;

        const searchTerm = normalizeText(searchInput?.value || "");
        let visibleCount = 0;

        articleCards.forEach(card => {
            const categoryMatches = activeFilter === "all" || card.dataset.category === activeFilter;
            const searchableText = normalizeText(`${card.dataset.search || ""} ${card.textContent}`);
            const searchMatches = !searchTerm || searchableText.includes(searchTerm);
            const isVisible = categoryMatches && searchMatches;

            card.hidden = !isVisible;
            if (isVisible) visibleCount += 1;
        });

        if (noResults) noResults.hidden = visibleCount !== 0;
        if (resultsStatus) {
            resultsStatus.textContent = `${visibleCount} insight${visibleCount === 1 ? "" : "s"} shown.`;
        }
    };

    filterButtons.forEach(button => {
        button.addEventListener("click", () => {
            activeFilter = button.dataset.filter || "all";
            filterButtons.forEach(item => {
                const isActive = item === button;
                item.classList.toggle("active", isActive);
                item.setAttribute("aria-pressed", String(isActive));
            });
            updateArticles();
        });
    });

    searchInput?.addEventListener("input", updateArticles);

    clearFiltersButton?.addEventListener("click", () => {
        activeFilter = "all";
        if (searchInput) searchInput.value = "";
        filterButtons.forEach(button => {
            const isActive = button.dataset.filter === "all";
            button.classList.toggle("active", isActive);
            button.setAttribute("aria-pressed", String(isActive));
        });
        updateArticles();
        searchInput?.focus();
    });

    document.querySelectorAll("[data-newsletter-form]").forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const message = form.querySelector("[data-form-message]");
            if (message) message.textContent = "Thank you — your next good idea is on its way.";
            form.reset();
        });
    });

    const copyButton = document.querySelector("[data-copy-link]");
    const copyFeedback = document.querySelector("[data-copy-feedback]");

    const showCopyFeedback = message => {
        if (!copyFeedback) return;
        copyFeedback.textContent = message;
        window.setTimeout(() => {
            copyFeedback.textContent = "";
        }, 2600);
    };

    copyButton?.addEventListener("click", async () => {
        try {
            await navigator.clipboard.writeText(window.location.href);
            showCopyFeedback("Link copied!");
        } catch (error) {
            const temporaryInput = document.createElement("input");
            temporaryInput.value = window.location.href;
            temporaryInput.setAttribute("readonly", "");
            temporaryInput.style.position = "fixed";
            temporaryInput.style.opacity = "0";
            document.body.appendChild(temporaryInput);
            temporaryInput.select();
            const copied = document.execCommand("copy");
            temporaryInput.remove();
            showCopyFeedback(copied ? "Link copied!" : "Copy the link from your address bar.");
        }
    });

    document.querySelectorAll("[data-share]").forEach(button => {
        button.addEventListener("click", () => {
            const pageUrl = encodeURIComponent(window.location.href);
            const pageTitle = encodeURIComponent(document.title);
            const shareUrls = {
                linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`,
                facebook: `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}&quote=${pageTitle}`
            };
            const shareUrl = shareUrls[button.dataset.share];
            if (shareUrl) window.open(shareUrl, "share-window", "width=680,height=520,noopener,noreferrer");
        });
    });

    const articleContent = document.getElementById("article-content");
    const progressBar = document.getElementById("reading-progress-bar");

    if (articleContent && progressBar) {
        const updateReadingProgress = () => {
            const start = articleContent.offsetTop - window.innerHeight * 0.35;
            const finish = articleContent.offsetTop + articleContent.offsetHeight - window.innerHeight * 0.7;
            const progress = Math.min(1, Math.max(0, (window.scrollY - start) / Math.max(1, finish - start)));
            progressBar.style.transform = `scaleX(${progress})`;
        };

        updateReadingProgress();
        window.addEventListener("scroll", updateReadingProgress, { passive: true });
        window.addEventListener("resize", updateReadingProgress);
    }

    const tocLinks = Array.from(document.querySelectorAll(".table-of-contents a"));
    const articleHeadings = tocLinks
        .map(link => document.querySelector(link.getAttribute("href")))
        .filter(Boolean);

    if (articleHeadings.length && "IntersectionObserver" in window) {
        const tocObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                tocLinks.forEach(link => {
                    link.classList.toggle("active", link.getAttribute("href") === `#${entry.target.id}`);
                });
            });
        }, { rootMargin: "-18% 0px -72% 0px" });

        articleHeadings.forEach(heading => tocObserver.observe(heading));
    }
});
