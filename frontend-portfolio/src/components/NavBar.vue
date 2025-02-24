<template>
  <div class="container">
    <nav id="header" :style="headerStyle">
      <div class="nav-logo">
        <p class="nav-name text-blue-700">Yoga Firmansyah</p>
      </div>
      <div class="nav-menu" :class="{ responsive: isMenuResponsive }">
        <ul class="nav_menu_list">
          <li class="nav_list" v-for="section in sections" :key="section.id">
            <a
              :href="`#${section.id}`"
              :class="[
                'nav-link',
                { 'active-link': activeSection === section.id },
              ]"
            >
              {{ section.name }}</a
            >
          </li>
        </ul>
      </div>
      <div class="nav-menu-btn" @click="toggleMenu">
        <i class="fa" :class="isMenuResponsive ? 'fa-times' : 'fa-bars'"></i>
      </div>
    </nav>
  </div>
</template>

<script setup>
import { ref, defineProps } from "vue";
import { useWebsiteFeatures } from "../composables/useWebsiteFeatures";

const props = defineProps({
  sections: Array,
  activeSection: String,
  headerStyle: Object,
});

const isMenuResponsive = ref(false);

const toggleMenu = () => {
  isMenuResponsive.value = !isMenuResponsive.value;
};
</script>

<style scoped>

/* -- Navigation menu -- */
nav {
    position: fixed;
    display: flex;
    justify-content: space-between;
    width: 100%;
    height: 90px;
    line-height: 90px;
    background: rgb(250, 250, 250);
    padding-inline: 9vw;
    transition: 0.3s;
    z-index: 100;
}

.nav-logo {
    position: relative;
}

.nav-name {
    font-size: 30px;
    font-weight: 600;
}

.nav-logo span {
    position: absolute;
    top: -15px;
    right: -20px;
    font-size: 5em;
    color: rgb(68, 68, 68);
}

.nav-menu,
.nav_menu_list {
    display: flex;
}

.nav-menu .nav_list {
    list-style: none;
    position: relative;
}

.nav-link {
    text-decoration: none;
    color: rgb(68, 68, 68);
    font-weight: 500;
    padding-inline: 15px;
    margin-inline: 20px;
}
.nav-menu-btn {
    display: none;
}

.nav-menu-btn i {
    font-size: 28px;
    cursor: pointer;
}

.active-link {
    position: relative;
    color: var(--color-blue-700);
    transition: 0.3s;
}


.mode {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}


/* -- 720px - Responsive settings -- */
@media only screen and (max-width: 720px) {
    .nav-button{
        display: none;
    }
    .nav-menu.responsive{
        left: 0;
    }
    .nav-menu{
        position: fixed;
        top: 80px;
        left: -100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        width: 100%;
        min-height: 450px;
        height: 90vh;
        transition: .3s;
    }
    .nav_menu_list{
        flex-direction: column;
    }
    .nav-menu-btn{
        display: flex;
        align-items: center;
        justify-content: center;
    }
}
</style>
