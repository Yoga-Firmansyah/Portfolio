import { ref, onMounted, onBeforeUnmount } from 'vue';

export const useScrollActive = (sections) => {
  const scrollActive = () => {
    const scrollY = window.scrollY;
    sections.value.forEach(current => {
      const sectionHeight = document.getElementById(current.id).offsetHeight;
      const sectionTop = document.getElementById(current.id).offsetTop - 50;
      const sectionId = current.id;

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        document.querySelector(`.nav-menu a[href*=${sectionId}]`).classList.add('active-link');
      } else {
        document.querySelector(`.nav-menu a[href*=${sectionId}]`).classList.remove('active-link');
      }
    });
  };

  onMounted(() => {
    window.addEventListener('scroll', scrollActive);
  });

  onBeforeUnmount(() => {
    window.removeEventListener('scroll', scrollActive);
  });
};