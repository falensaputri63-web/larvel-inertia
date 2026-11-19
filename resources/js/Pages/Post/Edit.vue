<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
})

const form = useForm({
    title: props.post.title,
    content: props.post.content,
})

// Kirim perubahan untuk ID post yang sedang diedit.
function updatePost() {
    form.put(`/posts/${props.post.id}`)
}
</script>

<template>
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 fw-bold">EDIT POST</h1>

            <a href="/posts" class="btn btn-secondary">
                KEMBALI
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form @submit.prevent="updatePost">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">TITLE POST</label>
                        <input
                            id="title"
                            v-model="form.title"
                            type="text"
                            class="form-control"
                            placeholder="Masukkan Title Post"
                            required
                        >
                        <div v-if="form.errors.title" class="mt-2 text-danger" role="alert">
                            {{ form.errors.title }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">CONTENT</label>
                        <textarea
                            id="content"
                            v-model="form.content"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan Content Post"
                            required
                        ></textarea>
                        <div v-if="form.errors.content" class="mt-2 text-danger" role="alert">
                            {{ form.errors.content }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        {{ form.processing ? 'MENYIMPAN...' : 'SIMPAN PERUBAHAN' }}
                    </button>
                </form>
            </div>
        </div>
    </main>
</template>
