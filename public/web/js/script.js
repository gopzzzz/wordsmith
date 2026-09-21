
document.addEventListener("DOMContentLoaded", () => {
    
    const header = document.getElementById("header");
    if (header) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    }

    const navToggle = document.querySelector(".nav-toggle");
    const primaryNav = document.getElementById("primary-navigation");

    const closeNavigation = () => {
        if (!navToggle || !primaryNav) return;
        navToggle.setAttribute("aria-expanded", "false");
        primaryNav.classList.remove("open");
    };

    if (navToggle && primaryNav) {
        navToggle.addEventListener("click", () => {
            const isOpen = navToggle.getAttribute("aria-expanded") === "true";
            navToggle.setAttribute("aria-expanded", String(!isOpen));
            primaryNav.classList.toggle("open", !isOpen);
        });

        primaryNav.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", closeNavigation);
        });

        document.addEventListener("click", event => {
            if (!header?.contains(event.target)) closeNavigation();
        });

        document.addEventListener("keydown", event => {
            if (event.key === "Escape") closeNavigation();
        });
    }

    document.querySelectorAll('.nav a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            document.querySelectorAll('.nav a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    const sections = document.querySelectorAll("section[id]");
    window.addEventListener("scroll", () => {
        let scrollY = window.pageYOffset;
        
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 100;
            const sectionId = current.getAttribute("id");
            
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                document.querySelector(".nav a[href*=" + sectionId + "]")?.classList.add("active");
            } else {
                document.querySelector(".nav a[href*=" + sectionId + "]")?.classList.remove("active");
            }
        });
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver((entries, observerInstance) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observerInstance.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll(".fade-in").forEach(el => {
            observer.observe(el);
        });
    } else {
        document.querySelectorAll(".fade-in").forEach(el => el.classList.add("visible"));
    }
    
});
