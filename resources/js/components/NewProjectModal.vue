<template>
  <modal name="new-project" classes="p-10 bg-card rounded-lg" height="auto">
    <h1 class="font-normal mb-16 text-center text-2xl">
      Let's Start Something New
    </h1>
    <form @submit.prevent="addProject">
      <div class="flex">
        <div class="flex-1 mr-4">
          <div class="mb-4">
            <label for="title" class="text-sm block mb-2">Title</label>
            <input
              type="text"
              id="title"
              v-model="form.title"
              class="border p-2 text-xs block w-full rounded"
              :class="errors.title ? 'border-error' : 'border-muted-light'"
            />
            <span
              class="text-xs italic text-error"
              v-if="errors.title"
              v-text="errors.title[0]"
            ></span>
          </div>
          <div class="mb-4">
            <label for="description" class="text-sm block mb-2"
              >Description</label
            >
            <textarea
              id="description"
              v-model="form.description"
              class="border border-muted-light p-2 text-xs block w-full rounded"
              :class="
                errors.description ? 'border-error' : 'border-muted-light'
              "
              rows="7"
            ></textarea>
            <span
              class="text-xs italic text-error"
              v-if="errors.description"
              v-text="errors.description[0]"
            ></span>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="mb-4">
            <label class="text-sm block mb-2">Need Some Tasks?</label>
            <input
              type="text"
              name="title"
              class="border border-muted-light mb-2 p-2 text-xs block w-full rounded"
              v-for="(task, index) in form.tasks"
              :key="index"
              v-model="task.value"
              placeholder="Task 1"
            />
          </div>
          <button
            class="inline-flex items-center text-xs"
            @click="addTaskInput"
          >
            <span>Add New Task Field</span>
          </button>
        </div>
      </div>
      <footer class="flex justify-end">
        <button
          class="button is-outlined mr-4"
          @click="$modal.hide('new-project')"
        >
          Cancel
        </button>
        <button class="button">Create Project</button>
      </footer>
    </form>
  </modal>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: "",
        description: "",
        tasks: [{ value: "" }]
      },
      errors: {}
    };
  },
  methods: {
    addTaskInput() {
      this.form.tasks.push({ value: "" });
    },
    async addProject() {
      try {
        location = (await axios.post("/projects", this.form)).data.message;
      } catch (error) {
        this.errors = err.response.data.errors;
      }
    }
  }
};
</script>

<style>
</style>
