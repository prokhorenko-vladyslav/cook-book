<template>
    <div class="ingredients">
        <div class="alert alert-success mt-3" role="alert" v-if="status">
            {{ status }}
        </div>
        <div class="row mt-5 pb-5 border-bottom" v-for="(recipeIngredient, recipeIndex) in recipeIngredients">
            <div class="col-md-5">
                <select class="w-100 form-control" name="recipeIngredients[]">
                    <option
                        v-for="(ingredient, index) in ingredients"
                        :value="ingredient.id"
                        :selected="recipeIngredient.id == ingredient.id"
                    >{{ ingredient.name}}</option>
                </select>
            </div>
            <div class="col-md-3">
                <input
                    class="form-control"
                    type="text" name="recipeIngredientsСount[]" placeholder="Введите количество..."
                    v-model="recipeIngredient.pivot.ingredient_count"
                >
            </div>
            <div class="col-md-1">
                <input
                    type="button"
                    class="form-control form-control__delete" @click="removeRecipeIngredient(recipeIndex)"
                >
            </div>
        </div>
        <div class="row mt-5 pb-5 border-bottom">
            <div class="col-md-3">
                <!-- Button trigger modal -->
                <button type="button" class="w-100 btn btn-primary" @click="addIngredientForm">
                    Добавить
                </button>
            </div>
            <div class="offset-md-4 col-md-2">
                <p class="text-right">Нет в списке?</p>
            </div>
            <div class="col-md-3">
                <add-new-ingredient :route="route" @addIngredient="addIngredient"></add-new-ingredient>
            </div>
        </div>
    </div>
</template>

<script>
    import AddNewIngredient from "./AddNewIngredient";

    export default {
        name: "Ingredients",
        components : {
            AddNewIngredient
        },
        props: ["ingredients", "route", "oldIngredients", "oldIngredientsCount", "recipeIngredientsProp"],
        data: function() {
            return {
                "status" : "",
                "recipeIngredients" : []
            }
        },
        created() {
            if (this.recipeIngredientsProp) {
                this.recipeIngredients = this.recipeIngredientsProp;
            }
        },
        methods: {
            addIngredientForm() {
                this.recipeIngredients.push({
                    name : "",
                    pivot : {
                        ingredient_count : ""
                    }
                });
            },
            removeRecipeIngredient(recipeIndex) {
                this.recipeIngredients.splice(recipeIndex, 1);
            },
            addIngredient(ingredient) {
                this.ingredients.push({
                    id : ingredient.id,
                    name : ingredient.name,
                    pivot : {
                        ingredient_count : ""
                    }
                });
                this.status = "Ингредиент успешно добавлен";
            }
        }
    }
</script>

<style scoped>

</style>
