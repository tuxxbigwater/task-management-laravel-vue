<template>
  <div v-bind="$attrs">
    <TaskItem v-for="task in tasks.sort(sortByCompleted)" :key="task.id" :task="task" />
    <div v-if="!tasks.length" class="no-tasks">
      <span class="task-empty">
        ¯\_(ツ)_/¯
      </span>
      <span>
        You don't have any tasks yet! Create your first task to get started and stay organized. It's quick and easy, and you'll be on your way to productivity in no time!
      </span>
    </div>
  </div>
</template>

<script setup>
  import { useStore } from 'vuex';
  import TaskItem from './TaskItem.vue';

  const store = useStore();
  const props = defineProps({
    tasks: {
      type: Array,
      required: true
    }
  })

  const sortByCompleted = (a, b) => {
    return a.completed - b.completed;
  }

</script>

<style lang="scss" scoped>
  .no-tasks {
    display: flex;
    flex-direction: column;
    font-size: 1.2em;
    color: #bbb;
    text-align: center;

    & > .task-empty {
      font-size: 3em !important;
    }
  }
</style>