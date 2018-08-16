<template>
    <div>
        <v-btn icon @click="likeIt">
            <v-icon :color="color">favorite</v-icon> {{count}}
        </v-btn>
    </div>
</template>

<script>
export default {
    props:['content'],
    data() {
        return {
            liked: this.content.liked,
            count: this.content.like_count
        }
    },
    computed: {
        color() {
            return this.liked ? 'red' : 'red lighten-4';
        }
    },
    created() { // https://laravel.com/docs/5.6/broadcasting#broadcasting-events
        Echo.channel('likeChannel').listen('LikeEvent', (e) => {
            console.log(e);
            if (this.content.id == e.id) {
                e.type == 'likeIt' ? this.count ++ : this.count --;
            }
        });
    },
    methods: {
        likeIt() {
            if (User.loggedIn()) {
                this.liked ? this.decrement() : this.increment();
                this.liked = !this.liked;
            }
        },
        increment() {
            axios.post(`/api/like/${this.content.id}`)
            .then(res => this.count++);
        },
        decrement() {
            axios.delete(`/api/like/${this.content.id}`)
            .then(res => this.count--);
        }
    }
}
</script>

<style>

</style>
