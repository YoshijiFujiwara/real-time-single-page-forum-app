<template>
    <v-toolbar>
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title>YoshijiFujiwara</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">

            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show">
                <v-btn flat>{{ item.title }}</v-btn>
            </router-link>
        </div>
    </v-toolbar>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { title: "フォーラム", to: "/forum", show: true },
        { title: "質問する", to: "/ask", show: User.loggedIn() },
        { title: "カテゴリー", to: "/category", show: User.admin() },
        { title: "ログイン", to: "/login", show: !User.loggedIn() },
        { title: "ログアウト", to: "/logout", show: User.loggedIn() }
      ]
    };
  },
  created() {
    EventBus.$on("logout", () => {
      User.logout();
    });
  }
};
</script>

<style>
</style>
