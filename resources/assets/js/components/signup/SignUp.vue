<template>
    <v-container>
        <v-form @submit.prevent="signup">
            <v-text-field
                v-model="form.name"
                type="text"
                label="名前"
                required
            ></v-text-field>
            <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

            <v-text-field
                v-model="form.email"
                type="email"
                label="メールアドレス"
                required
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

            <v-text-field
                v-model="form.password"
                type="password"
                label="パスワード"
                required
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

            <v-text-field
                v-model="form.password_confirmation"
                type="password"
                label="パスワード(再入力)"
                required
            ></v-text-field>

            <v-btn
                color="green"
                type="submit"
            >サインアップ</v-btn>

            <router-link to="/login">
                <v-btn color="blue">ログイン</v-btn>
            </router-link>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors: {}
        }
    },
    created() {
        if (User.loggedIn) {
            this.$router.push({name: 'forum'}); // ログイン状態の時に、/loginを打ち込んでも、フォーラム画面にリダイレクト
        }
    },
    methods: {
        signup() {
            axios.post('/api/auth/signup', this.form)
                .then(res => {
                    User.responseAfterLogin(res);
                    this.$router.push({name: 'forum'}); // フォーラム画面にリダイレクト
                })
                .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>

</style>
