```vue
<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
})

// Inertia mengirim kredensial ke Laravel dan mengisi form.errors jika validasi gagal.
const submit = () => {
    form.post('/login')
}
</script>

<template>
    <div class="login-page">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">🌊</div>
                <h1>Selamat Datang</h1>
                <p>Silakan login untuk melanjutkan</p>
            </div>

            <form @submit.prevent="submit">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        placeholder="Masukkan email"
                        autocomplete="email"
                    />

                    <small v-if="form.errors.email" class="error">
                        {{ form.errors.email }}
                    </small>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                    />

                    <small v-if="form.errors.password" class="error">
                        {{ form.errors.password }}
                    </small>
                </div>

                <button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Sedang Login...' : 'Login' }}
                </button>
            </form>

        </div>
    </div>
</template>

<style scoped>
* {
    box-sizing: border-box;
}

.login-page {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
    background:
        radial-gradient(circle at top left, #164e78, transparent 35%),
        radial-gradient(circle at bottom right, #0e7490, transparent 35%),
        #041328;
    font-family: Arial, sans-serif;
}

.login-card {
    width: 100%;
    max-width: 420px;
    padding: 40px;
    border-radius: 24px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(15px);
    color: white;
}

.login-header {
    text-align: center;
    margin-bottom: 30px;
}

.logo {
    width: 70px;
    height: 70px;
    margin: 0 auto 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(103, 232, 249, 0.15);
    font-size: 35px;
}

.login-header h1 {
    margin: 0 0 8px;
    font-size: 30px;
}

.login-header p {
    margin: 0;
    color: #b9d8e8;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 13px 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    outline: none;
    background: rgba(255, 255, 255, 0.08);
    color: white;
    font-size: 15px;
}

.form-group input::placeholder {
    color: #9bb8c7;
}

.form-group input:focus {
    border-color: #67e8f9;
    box-shadow: 0 0 0 3px rgba(103, 232, 249, 0.12);
}

button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: #67e8f9;
    color: #041328;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(103, 232, 249, 0.25);
}

button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.error {
    display: block;
    margin-top: 6px;
    color: #fecaca;
}

</style>
```
