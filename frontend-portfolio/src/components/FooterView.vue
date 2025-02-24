<template>
  <footer class="bg-gray-800">
    <div>
      <div
        class="container flex flex-col md:flex-row justify-between text-white"
        style="margin-inline: auto"
      >
        <div class="mb-6 md:mb-0 md:w-1/3" style="padding: 10px">
          <h2 class="text-xl font-bold mb-4">Yoga Firmansyah</h2>
          <p style="padding-block: 16px">
            Sincerely appreciate your visit. Together, we can make great things
            happen.
          </p>
        </div>
        <div class="mb-6 md:mb-0 md:w-1/3"></div>
        <div class="md:w-1/3 flex text-white" style="padding: 10px">
          <div class="">
            <h3 class="font-bold text-2xl tracking-wider">Contact</h3>
            <ul class="space-y-4 text-sm">
              <li style="padding-block: 4px">
                <a
                  href="https://wa.me/6282231817192?text=Hallo%Yoga%Firmansyah"
                >
                  <i class="fa-brands fa-whatsapp"></i> +62 822 3181 7192
                </a>
              </li>
              <li style="padding-block: 4px">
                <a href="mailto:yogafirmansyah.jobs@gmail.com">
                  <i class="fa-solid fa-envelope"></i>
                  yogafirmansyah.jobs@gmail.com
                </a>
              </li>
              <li style="padding-block: 4px">
                <a
                  href="https://www.google.com/maps/place/Kabupaten+Ngawi,+Jawa+Timur/"
                >
                  <i class="fa-solid fa-map-location-dot"></i> Ngawi, East Java
                </a>
              </li>
            </ul>
            <div class="flex justify-start gap-4" style="padding-top: 4px">
              <a
                href="https://www.linkedin.com/in/yoga-firmansyah-1ba5042b7/"
                class="icon bg-white text-black hover:bg-gray-800 hover:border hover:border-white hover:text-white"
                ><i class="fa-brands fa-linkedin"></i
              ></a>
              <a
                href="https://github.com/Yoga-Firmansyah"
                class="icon bg-white text-black hover:bg-gray-800 hover:border hover:border-white hover:text-white"
                ><i class="fa-brands fa-github"></i
              ></a>
              <a
                href="https://www.instagram.com/firmansyahyoga41/"
                class="icon bg-white text-black hover:bg-gray-800 hover:border hover:border-white hover:text-white"
                ><i class="fa-brands fa-instagram"></i
              ></a>
              <a
                href="https://t.me/Yogaf41?text=Hallo%Yoga%Firmansyah"
                class="icon bg-white text-black hover:bg-gray-800 hover:border hover:border-white hover:text-white"
                ><i class="fa-brands fa-telegram"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer text-white">
      <p>
        Copyright &copy;
        <a href="#home" class="text-blue-300">Yoga Firmansyah</a>
      </p>
    </div>
  </footer>
</template>

<script setup>
import { ref, defineProps } from "vue";

const props = defineProps({
  sections: Array,
});
</script>
