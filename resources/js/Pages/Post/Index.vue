<script setup>
import { Link, router } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const props = defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
    flash: {
        type: Object,
        default: () => ({}),
    },
})

const deletingPostId = ref(null)
const searchInput = ref('')
const searchQuery = ref('')

// Filter lokal bekerja pada judul dan isi tanpa meminta ulang data ke server.
const filteredPosts = computed(() => {
    const query = searchQuery.value.trim().toLocaleLowerCase()

    if (!query) {
        return props.posts
    }

    return props.posts.filter((post) =>
        [post.title, post.content].some((value) =>
            String(value ?? '').toLocaleLowerCase().includes(query),
        ),
    )
})

function searchPosts() {
    searchQuery.value = searchInput.value
}

function deletePost(post) {
    // Minta konfirmasi agar penghapusan tidak terjadi karena salah klik.
    if (!window.confirm(`Hapus post "${post.title}"?`)) {
        return
    }

    deletingPostId.value = post.id
    router.delete(`/posts/${post.id}`, {
        onFinish: () => {
            deletingPostId.value = null
        },
    })
}
</script>

<template>
    <div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">

                <Link class="navbar-brand" href="/posts">
                    LARAVEL + VUE + INERTIA.JS
                </Link>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarCollapse"
                >
                </div>

            </div>
        </nav>

        <!-- Content -->
        <main class="container mt-5">

            <nav class="nav nav-tabs mb-4" aria-label="Navigasi halaman posts">
                <Link class="nav-link" href="/dashboard">Dashboard</Link>
                <a class="nav-link active" href="#posts" aria-current="page">Posts</a>
            </nav>

            <div v-if="flash.success" class="alert alert-success" role="status">
                {{ flash.success }}
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
                <Link
                    href="/posts/create"
                    class="btn btn-primary"
                >
                    TAMBAH DATA
                </Link>

                <form class="d-flex gap-2" role="search" @submit.prevent="searchPosts">
                    <input
                        v-model="searchInput"
                        class="form-control"
                        type="search"
                        placeholder="Cari judul atau isi post"
                        aria-label="Cari judul atau isi post"
                    >
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>

            <section id="posts" aria-labelledby="posts-title">
                <h2 id="posts-title" class="h3 mb-3">Posts</h2>
                <div class="card border-0 rounded shadow-sm">

                    <div class="card-body">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th>TITLE</th>
                                    <th>CONTENT</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr
                                    v-for="post in filteredPosts"
                                    :key="post.id"
                                >
                                    <td>{{ post.title }}</td>

                                    <td>{{ post.content }}</td>

                                    <td>
                                        <Link
                                            :href="`/posts/${post.id}/edit`"
                                            class="btn btn-warning btn-sm me-2"
                                        >
                                            EDIT
                                        </Link>

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            :disabled="deletingPostId === post.id"
                                            @click="deletePost(post)"
                                        >
                                            {{ deletingPostId === post.id ? 'MENGHAPUS...' : 'DELETE' }}
                                        </button>
                                    </td>
                                </tr>

                                <tr v-if="posts.length === 0">
                                    <td
                                        colspan="3"
                                        class="text-center"
                                    >
                                        Belum ada data post.
                                    </td>
                                </tr>

                                <tr v-else-if="filteredPosts.length === 0">
                                    <td colspan="3" class="text-center">
                                        Tidak ada post yang cocok dengan pencarian.
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </section>

        </main>

    </div>
</template>