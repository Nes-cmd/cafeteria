<template>
  <section class="content">
    <div class="container-fluid">

                <div class="form-group">
                  <label>Select</label>
                  <select>
                      <option value="">Select Category</option>
                      <option v-for="category in getAllCategory" 
                            :value="category.id">
                           {{ category.name }}
                      </option>
                  </select>
                </div>

    </div>
  </section>
</template>

<script>
export default {

     name: "List",
  
      mounted() {

        this.$store.dispatch("allCategoryFromDatabase")

      },
      computed: {
        getAllCategory(){ //final output from here
            return this.$store.getters.getCategoryFormGetters
        }
      },

};
</script>

<style scoped>
</style> 