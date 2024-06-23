<template>
  <div class="task-form">
    <input class="task-title" type="text" v-model="title" placeholder="➕ Describe your task description" @keyup.enter="submitTask">
    <button class="task-submit" @click="submitTask">Add Task</button>
  </div>
</template>

<script setup>
  import { ref } from 'vue';
  import { useStore } from 'vuex';

  const store = useStore();
  const title = ref('');

  const submitTask = () => {
  if (title.value.trim()) {
    store.dispatch('addTask', title.value)
    title.value = ''
  }
}

</script>


<style lang="scss" scoped>
  .task-form {
    display: flex;
    flex: 1;
    gap: 20px;

    & input.task-title {
      flex: 1;
      background: transparent;
      border: none;
      border-bottom: 1px solid white;
      font-size: 1.2em;
      color: white;
      outline: none;
    }

    & button.task-submit {
      height: 60px;
      padding: 0 20px;
      font-size: 1em;
      border: none;
      box-shadow: none;
      background: orange;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
  }

</style>