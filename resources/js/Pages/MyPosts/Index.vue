<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Posts
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <jet-form-section @submitted="createPost">
                    <template #title>
                        Create Post
                    </template>

                    <template #description>
                        Create a new blog post to be published on the homepage.
                    </template>

                    <template #form>
                        <!-- Post Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="Title" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="createPostForm.title" autofocus />
                            <jet-input-error :message="createPostForm.error('title')" class="mt-2" />
                        </div>

                        <!-- Post Publication Date -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="publication_date" value="Publication Date" />
                            <jet-input id="publication_date" type="date" class="mt-1 block w-full" v-model="createPostForm.publication_date" autofocus />
                            <jet-input-error :message="createPostForm.error('publication_date')" class="mt-2" />
                        </div>

                        <!-- Post Description -->
                        <div class="col-span-6">
                            <jet-label for="description" value="Description" />
                            <textarea id="description" class="mt-1 block w-full form-input shadow-sm" rows="4" v-model="createPostForm.description"></textarea>
                            <jet-input-error :message="createPostForm.error('description')" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="createPostForm.recentlySuccessful" class="mr-3">
                            Created.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': createPostForm.processing }" :disabled="createPostForm.processing">
                            Create
                        </jet-button>
                    </template>
                </jet-form-section>

                <div v-if="posts.length > 0">
                    <jet-section-border />

                    <div class="mt-10 sm:mt-0">
                        <jet-action-section>
                            <template #title>
                                Your Posts
                            </template>

                            <template #description>
                                List of posts you have published so far.
                            </template>

                            <!-- Post List -->
                            <template #content>
                                <div class="space-y-6">
                                    <div class="flex items-center justify-between" v-for="post in posts">
                                        <div>
                                            <a class="underline" href="/" target="_blank">{{ post.title }}</a>
                                        </div>

                                        <div class="text-sm text-gray-400" v-if="post.publication_date">
                                            Published {{ post.publication_date | ago }}
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </jet-action-section>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetFormSection from './../../Jetstream/FormSection'
    import JetLabel from './../../Jetstream/Label'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetButton from './../../Jetstream/Button'
    import JetSectionBorder from './../../Jetstream/SectionBorder'
    import JetActionSection from './../../Jetstream/ActionSection'

    export default {
        components: {
            AppLayout,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
            JetActionMessage,
            JetButton,
            JetSectionBorder,
            JetActionSection,
        },

        props: [
            'posts',
        ],

        data() {
            return {
                createPostForm: this.$inertia.form({
                    title: '',
                    publication_date: '',
                    description: ''
                }, {
                    resetOnSuccess: true,
                }),
            }
        },

        methods: {
            createPost() {
                this.createPostForm.post(route('dashboard.my-posts.store'), {
                    preserveScroll: true,
                })
            },
        }
    }
</script>
