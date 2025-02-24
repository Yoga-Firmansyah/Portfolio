<template>
  <section id="skills" class="section bg-gray-300" style="padding-inline: 10vw;">
  <div >
    <div class="text-center mb-12 top-header">
      <h1 class="text-3xl font-semibold text-gray-800">My Skills</h1>
    </div>
    <div
      class="bg-gray-800 skills-box grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-2 item rounded-2xl shadow-lg shadow-black"
      style="padding: 20px;"
    >
      <div
        class="flex flex-col items-center"
        v-for="skill in skills"
        :key="skill.name"
      >
        <img :src="skill.icon" alt="Skill Icon" class="w-16 h-16" />
        <span class="text-lg text-white text-center">{{ skill.name }}</span>
      </div>
    </div>
  </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const sections = ref([{ id: "skills", name: "Skills" }]);

const skills = ref([]);

// const fetchData = async () => {
//   try {
//     const response = await axios.get("http://localhost:8000/api/skills");
//     skills.value = response.data;
//   } catch (error) {
//     console.error(error);
//   }
// };

const fetchData = async () => {
  try {
    const response = await fetch("/skillData.json");
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const data = await response.json();
    skills.value = data;
  } catch (error) {
    console.error("There was a problem with the fetch operation:", error);
  }
};

onMounted(() => {
  fetchData();
});
</script>
