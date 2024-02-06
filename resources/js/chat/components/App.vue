<template>
    <div v-if="auth && auth.id !== undefined">
        <h2>Select any user to chat with </h2>
        <ul class="mt-3 mx-3 list-none inline-block">
            <li v-for="user in users" v-bind:key="user.id" class="mb-4 inline ">
            <i class="fas fa-comment text-teal-700 px-2"></i>

                <a href="#" class="text-teal-700 hover:text-teal-900 underline" v-on:click.prevent="showChatPanel(user)">{{user.name}}</a>
            </li>
        </ul>

    </div>
    <div v-else>
        <p><a href="/login" class="text-teal-700 hover:text-teal-900 underline capitalize">Login to Chat</a></p>
    </div>
    <div class="fixed bottom-0 right-4 z-99999 w-full chat-panel-containers">
        <div class="relative overflow-x-scroll flex flex-row-reverse mx-6">
            <chatPanel v-for="panel in chatPanels.panels" :key="panel.selectedUser.id"
            :user="panel.selectedUser" :emitted-message="panel.emittedMessage" @onCloseChat="hideChatPanel"  />

        </div>

    </div>
    </template>


    <script>
    import {provide , ref , reactive} from "vue";
    import ChatPanel from "./ChatPanel.vue";

    export default{
        name : "App",
        components: {ChatPanel},
        props : ["auth"],
        setup({auth}){
            provide("auth" , auth);
            const onlineUsers = ref([]);

            let chatPanels = reactive({panels:[]});

            async function getOnlineUsers()
            {
                const result = await window.axios.get("/online-users");

                if(result.data.users)
                {
                    onlineUsers.value = result.data.users;
                }
            }

            function showChatPanel(user, emittedMessage=null)
            {
                const isPanelOpened = chatPanels.panels.find(panel => panel.selectedUser.id === user.id);
                if(!isPanelOpened)
                {
                    const userPanel = {
                        selectedUser : user ,
                        emittedMessage
                    };
                    chatPanels.panels.push(userPanel);
                    return true;
                }

                const index = chatPanels.panels.findIndex(panel => panel.selectedUser.id === user.id);
                chatPanels.panels[index]={...chatPanels.panels[index], emittedMessage};
                return false;


            }

            function hideChatPanel(user)
            {
                const filtered = [...chatPanels.panels].filter(panel => panel.selectedUser.id !== user.id);
                chatPanels.panels = [...filtered];

            }
            getOnlineUsers();
            return {
                users : onlineUsers,
                showChatPanel,
                hideChatPanel,
                chatPanels
            }
        }
    }
    </script>

    <style scoped>

    </style>
