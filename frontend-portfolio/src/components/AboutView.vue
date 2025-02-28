<template>
  <section class="bg-gray-600 section" id="about" style="padding-inline: 10vw">
    <div class="top-header">
      <h1 class="text-3xl font-semibold text-white">About Me</h1>
    </div>
    <div class="row">
      <div class="col">
        <div class="about-info bg-white shadow-md shadow-black">
          <h3 class="text-2xl">My Introduction</h3>
          <p class="">
            Bachelor's degree in Information Technology with a solid foundation
            in web development. Experienced in designing and developing
            responsive websites, with a current focus on utilizing Laravel and
            Vue.js to create dynamic and responsive websites. Dedicated to
            continuous learning and innovation.
          </p>
        </div>
      </div>
      <div class="col">
        <div
          class="education-box education-info bg-white shadow-md shadow-black"
        >
          <h3 class="text-center text-2xl font-semibold">My Education</h3>
          <ul style="margin-top: 10px">
            <li
              class="bg-neutral-200 rounded-lg shadow-md shadow-gray-600 text-white"
              style="padding-left: 10px"
              v-for="data in education"
              :key="data.id"
            >
              <h2 class="text-black text-xl font-semibold">{{ data.name }}</h2>
              <p class="text-gray-700">{{ data.institution }}</p>
              <p class="text-green-800 font-semibold">
                {{ data.start }} - {{ data.end }}
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const sections = ref([{ id: "about", name: "About" }]);

const education = ref([]);

// const fetchData = async () => {
//   try {
//     const response = await axios.get("http://localhost:8000/api/educations");
//     education.value = response.data;
//   } catch (error) {
//     console.error(error);
//   }
// };

const fetchData = async () => {
  try {
    const response = await fetch("/educationData.json");
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const data = await response.json();
    education.value = data;
  } catch (error) {
    console.error("There was a problem with the fetch operation:", error);
  }
};


onMounted(() => {
  fetchData();
});
</script>

<style scoped>
/* -- About info -- */
.education-info {
  position: relative;
  display: flex;
  flex-direction: column;
  padding-block: 30px 70px;
  padding-inline: 20px;
  width: 100%;
  border-radius: 20px;
}
</style>
