<template>
    <Sender :message="message" v-if="auth.id === message.sender_id"/>
    <Recevier :message="message" v-else/>
</template>

<script>
import {inject} from "vue";
import Sender from "@/chat/components/Sender.vue";
import Recevier from "@/chat/components/Receiver.vue";
export default{
    name: "MessageLine",
    components: {Sender, Recevier},
    props : ["message"],
    setup(){
        const auth = inject("auth");
        return{
            auth
        }
    }
}
</script>

<style scoped>

</style>
