<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({
    errors: Object
})

const post = reactive({
    title: '',
    content: ''
})

// Laravel memvalidasi data dan mengembalikan kesalahan ke halaman ini bila tidak valid.
function storePost() {
    router.post('/posts', post)
}
</script>

<template>
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">TAMBAH POST</h2>

            <a href="/posts" class="btn btn-secondary">
                KEMBALI
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form @submit.prevent="storePost">

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            TITLE POST
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            v-model="post.title"
                            placeholder="Masukkan Title Post"
                        >

                        <div
                            v-if="errors.title"
                            class="mt-2 alert alert-danger"
                        >
                            {{ errors.title }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            CONTENT
                        </label>

                        <textarea
                            class="form-control"
                            rows="5"
                            v-model="post.content"
                            placeholder="Masukkan Content Post"
                        ></textarea>

                        <div
                            v-if="errors.content"
                            class="mt-2 alert alert-danger"
                        >
                            {{ errors.content }}
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary me-2"
                    >
                        SIMPAN
                    </button>

                    <button
                        type="reset"
                        class="btn btn-warning"
                    >
                        RESET
                    </button>

                </form>

            </div>
        </div>

    </div>
</template>