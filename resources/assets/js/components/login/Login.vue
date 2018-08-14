<template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
                v-model="form.email"
                type="email"
                label="メールアドレス"
                required
            ></v-text-field>

            <v-text-field
                v-model="form.password"
                type="password"
                label="パスワード"
                required
            ></v-text-field>

            <v-btn
                color="green"
                type="submit"
            >ログイン</v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data(){
        return {
            form: {
                email: null,
                password: null
            }
        }
    },
    methods: {
        login() {
            User.login(this.form);
        }
    }
}
</script>

<style>

</style>
