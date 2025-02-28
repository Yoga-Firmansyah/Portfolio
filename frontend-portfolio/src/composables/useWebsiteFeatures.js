// src/composables/useWebsiteFeatures.js
import { ref, onMounted, onBeforeUnmount } from 'vue';
import Typed from 'typed.js';
import ScrollReveal from 'scrollreveal';

export function useWebsiteFeatures(sections) {
    // Reactive state
    const isDarkMode = ref(false);
    const isMenuOpen = ref(false);

    const headerStyle = ref({
        boxShadow: 'none',
        height: '90px',
        lineHeight: '90px',
    });

    const activeSection = ref(sections.value[0].id);

    // Methods
    const toggleDarkMode = () => {
        isDarkMode.value = !isDarkMode.value;
    };

    const toggleMenu = () => {
        isMenuOpen.value = !isMenuOpen.value;
    };

    const headerShadow = () => {
        if (window.scrollY > 50) {
            headerStyle.value = {
                boxShadow: '0 1px 6px rgba(0, 0, 0, 0.8)',
                height: '70px',
                lineHeight: '70px',
            };
        } else {
            headerStyle.value = {
                boxShadow: 'none',
                height: '90px',
                lineHeight: '90px',
            };
        }
    };

    const scrollActive = () => {
        const scrollY = window.scrollY;
        sections.value.forEach(current => {
            const sectionHeight = document.getElementById(current.id).offsetHeight;
            const sectionTop = document.getElementById(current.id).offsetTop - 50;
            const sectionId = current.id;

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                activeSection.value = sectionId; // Update active section
            }
        });
    };

    // Lifecycle hooks
    onMounted(() => {
        window.addEventListener('scroll', headerShadow);
        window.addEventListener('scroll', scrollActive);

        // Initialize ScrollReveal
        const sr = ScrollReveal({
            origin: 'top',
            distance: '100px',
            duration: 2000,
            reset: true,
        });

        sr.reveal('.featured-text-card', {});
        sr.reveal('.featured-name', { delay: 100 });
        sr.reveal('.featured-text-info', { delay: 200 });
        sr.reveal('.featured-text-btn', { delay: 200 });
        sr.reveal('.social_icons', { delay: 200 });
        sr.reveal('.project-box', { delay: 200 });
        sr.reveal('.featured-image', { delay: 300 });
        sr.reveal('.top-header', {});
        sr.reveal('.skills-box', { delay: 200 });

        // Scroll reveal for left-right animations
        const srLeft = ScrollReveal({
            origin: 'left',
            distance: '40px',
            duration: 2000,
            reset: true,
        });

        srLeft.reveal('.about-info', { delay: 200 });

        const srRight = ScrollReveal({
            origin: 'right',
            distance: '40px',
            duration: 2000,
            reset: true,
        });

        srRight.reveal('.education-box', { delay: 200 });
    });

    // Cleanup event listeners on unmount
    onBeforeUnmount(() => {
        window.removeEventListener('scroll', headerShadow);
        window.removeEventListener('scroll', scrollActive);
    });

    return {
        isDarkMode,
        isMenuOpen,
        headerStyle,
        activeSection,
        toggleDarkMode,
        toggleMenu,
    };
}
