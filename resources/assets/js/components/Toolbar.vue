<template>
    <v-toolbar>
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title>YoshijiFujiwara</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">
            <router-link to="/forum">
                <v-btn flat>フォーラム</v-btn>
            </router-link>
            <v-btn flat>質問する</v-btn>
            <v-btn flat >カテゴリー</v-btn>
            <router-link to="/login">
                <v-btn flat>ログイン</v-btn>
            </router-link>
        </div>
    </v-toolbar>
</template>

<script>
export default {

}
</script>

<style>

</style>
