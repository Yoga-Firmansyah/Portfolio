<template>
  <NavBar
    :sections="sections"
    :activeSection="activeSection"
    :headerStyle="headerStyle"
  />
  <main>
    <HeroView />
    <AboutView />
    <SkillsView />
    <ProjectsView />
  </main>
  <FooterView :sections="sections" />
</template>

<script setup>
import { ref } from "vue";
import { useWebsiteFeatures } from "../composables/useWebsiteFeatures";
import NavBar from "../components/NavBar.vue";
import HeroView from "../components/HeroView.vue";
import AboutView from "../components/AboutView.vue";
import SkillsView from "../components/SkillsView.vue";
import ProjectsView from "../components/ProjectsView.vue";
import FooterView from "../components/FooterView.vue";

const sections = ref([
  { id: "home", name: "Home" },
  { id: "about", name: "About" },
  { id: "skills", name: "Skills" },
  { id: "projects", name: "Projects" },
]);

const { headerStyle, activeSection } = useWebsiteFeatures(sections);
</script>
