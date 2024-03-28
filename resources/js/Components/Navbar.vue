<script setup>
const props = defineProps(['worm']);
</script>

<template>
   <div class="navbar bg-base-100">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">Would You Date Me If I Was A Worm?</a>
  </div>
  <div class="flex-none">
    <ul v-show="props.worm" class="menu menu-horizontal px-1">
      <li><a :href="`/worms/${props.worm.id}/matches`">Find A Match</a></li>
      <li><a :href="`/worms/${props.worm.id}`">Profile</a></li>
    </ul>
  </div>
</div>
</template>
