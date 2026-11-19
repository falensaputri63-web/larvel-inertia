<script setup>
import { Link, useForm } from '@inertiajs/vue3'

defineProps({
    userName: {
        type: String,
        default: null,
    },
})

const logoutForm = useForm({})

// Logout dikirim sebagai POST agar sesi dapat diakhiri melalui rute Laravel.
function logout() {
    logoutForm.post('/logout')
}
</script>

<template>
    <div class="dashboard-page">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <Link class="navbar-brand" href="/posts">
                    LARAVEL + VUE + INERTIA.JS
                </Link>

                <div class="d-flex align-items-center gap-3">
                    <span v-if="userName" class="navbar-text text-light">
                        Halo, <strong>{{ userName }}</strong>
                    </span>
                    <form v-if="userName" @submit.prevent="logout">
                        <button
                            type="submit"
                            class="btn btn-outline-danger btn-sm"
                            :disabled="logoutForm.processing"
                        >
                            {{ logoutForm.processing ? 'LOGOUT...' : 'LOGOUT' }}
                        </button>
                    </form>
                    <Link v-else class="btn btn-outline-light btn-sm" href="/login">LOGIN</Link>
                </div>
            </div>
        </nav>

        <main class="container">
            <nav class="nav nav-tabs mt-3 mb-3" aria-label="Navigasi dashboard dan posts">
                <Link class="nav-link active" href="/dashboard" aria-current="page">Dashboard</Link>
                <Link class="nav-link" href="/posts">Posts</Link>
            </nav>

            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-2">Dashboard</h1>
                    <p class="text-muted mb-0">You're logged in!</p>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
.dashboard-page {
    min-height: 100vh;
    background-color: #f8f9fa;
}

.dashboard-page main {
    padding-bottom: 2rem;
}
</style>
