<template>
  <section id="projects" class="section" style="padding-inline: 10vw;">
    <div>
      <div class="text-center top-header">
        <h1 class="text-3xl font-semibold text-gray-800">My Projects</h1>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 project-box">
        <div
          class="project-card shadow-md shadow-gray-700"
          v-for="project in projects"
          :key="project.name"
        >
          <div
            class="project-image"
            :style="{ backgroundImage: `url(${project.image})` }"
          >
            <div class="project-content">
              <div class="bg-black">
                <p class="project-name">{{ project.name }}</p>
              </div>
              <div class="project-info">
                <p class="project-description">{{ project.description }}</p>
                <div class="skills-icons flex justify-center bg-gray-800 h-14 rounded-lg">
                  <span v-for="skill in project.skills" :key="skill">
                    <img :src="skill.icon" :alt="skill.name" class="w-12" />
                  </span>
                </div>
                <div class="flex justify-center">
                  <a :href="project.git_link" class="project-link">Code</a>
                  <a :href="project.live_link" class="project-link">Demo</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const sections = ref([{ id: "projects", name: "Projects" }]);

const projects = ref([]);

// const fetchData = async () => {
//   try {
//     const response = await axios.get("http://localhost:8000/api/projects");
//     projects.value = response.data;
//   } catch (error) {
//     console.error(error);
//   }
// };

const fetchData = async () => {
  try {
    const response = await fetch("/projectData.json");
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const data = await response.json();
    projects.value = data;
  } catch (error) {
    console.error("There was a problem with the fetch operation:", error);
  }
};

onMounted(() => {
  fetchData();
});
</script>

<style scoped>
.project-card {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  transition: transform 0.3s;
}

.project-card:hover {
  transform: scale(1.05);
}

.project-image {
  height: 300px; /* Full height of the card */
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  position: relative;
  transition: all 0.3s ease;
}

.project-content {
  position: absolute;
  bottom: 0; /* Start at the bottom */
  left: 0;
  right: 0;
  background: rgba(43, 43, 40, 0.8);
  color: white; /* Text color */
  transition: bottom 1s ease; /* Transition for hover effect */
}

.project-card:hover .project-content {
  bottom: 0; /* Move up to reveal full content */
}

.project-name {
  margin: 0 1em;
  font-weight: bold;
  font-size: 1.25rem; /* Adjust font size as needed */
}

.project-info {
  display: none; /* Initially hidden */
}

.project-card:hover .project-info {
  display: block; /* Show on hover */
}

.project-description {
  font-size: 0.875rem;
  margin: 0 1em;
  text-align: justify;
}

.project-link {
  display: inline-block;
  margin: 0.5em 1em;
  padding: 5px 10px;
  background: rgb(167, 116, 13);

  color: white;
  border-radius: 5px;
  text-decoration: none;
  transition: background 0.3s;
}

.project-link:hover {
  background: rgb(209, 144, 16);
}

/* Skills Icons */
.skills-icons {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  margin: 1em;
  gap: 5px;
}

.skill-icon {
  display: inline-block;
}

/* Dark mode styles */
.dark .project-info {
  background: rgba(255, 255, 255, 0.7); /* Light background for dark mode */
  color: black; /* Dark text for better contrast */
}
</style>
