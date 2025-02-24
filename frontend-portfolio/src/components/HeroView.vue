<template>
  <section style="padding-inline: 10vw;">
    <div id="home" class="featured-box">
      <div class="featured-text">
        <div class="featured-text-card">
          <span>Yoga Firmansyah</span>
        </div>
        <div class="featured-name">
          <p>I'm <span class="typedText"></span></p>
        </div>
        <div class="featured-text-info">
          <p>
            Passionate full stack web developer committed to building efficient
            and innovative web applications.
          </p>
        </div>
        <div class="featured-text-btn">
          <a
            href="mailto:yogafirmansyah.jobs@gmail.com"
            class="bg-blue-500 text-white rounded-sm hover:bg-blue-700"
            style="padding: 4px"
            >Get in touch</a
          >
        </div>
        <div class="social_icons">
          <a
            href="https://www.linkedin.com/in/yoga-firmansyah-1ba5042b7/"
            class="icon hover:text-blue-700"
            ><i class="fa-brands fa-linkedin"></i
          ></a>
          <a href="https://github.com/Yoga-Firmansyah" class="icon hover:text-blue-700"
            ><i class="fa-brands fa-github"></i
          ></a>
          <a href="https://www.instagram.com/firmansyahyoga41/" class="icon hover:text-blue-700"
            ><i class="fa-brands fa-instagram"></i
          ></a>
          <a
            href="https://t.me/Yogaf41?text=Hallo%Yoga%Firmansyah"
            class="icon hover:text-blue-700"
            ><i class="fa-brands fa-telegram"></i
          ></a>
        </div>
      </div>
      <div class="featured-image">
        <div class="image">
          <img src="../assets/profil.png" alt="avatar" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import Typed from "typed.js";

onMounted(() => {
  // Initialize Typed.js for typing effect
  new Typed(".typedText", {
    strings: [
      "Full Stack Developer",
      "Web Developer",
      "Backend Developer",
      "Frontend Developer",
    ],
    loop: true,
    typeSpeed: 100,
    backSpeed: 80,
    backDelay: 2000,
  });
});
</script>

<style scoped></style>
