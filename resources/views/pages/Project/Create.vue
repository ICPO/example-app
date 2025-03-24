<template>
    <Head><title>Создание проекта</title></Head>

    <div class="g-titlebar">
        <h1>Создание проекта</h1>
        <Link href="/projects/" class="right">
            <font-awesome-icon icon="rotate-left" />
            Вернуться к списку проектов
        </Link>
    </div>

    <form class="b-form" :class="{ loading: form.processing }" @submit.prevent="submit">
        <b-formrow title="Название" :error="errors.name">
            <el-input type="text" v-model="form.name" />
        </b-formrow>

        <b-formrow title="Описание" :error="errors.description">
            <el-input type="textarea" v-model="form.description" />
        </b-formrow>

        <b-formrow title="Ответственный" :error="errors.assigned_to">
            <el-select v-model="form.assigned_to" filterable>
                <el-option v-for="(oTitle, oValue) in users" :key="oValue" :label="oTitle" :value="parseInt(oValue)" />
            </el-select>
        </b-formrow>

        <b-formrow>
            <button class="g-button">Создать проект</button>
        </b-formrow>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import BFormrow from "../../blocks/BFormrow.vue";
import { ElDatePicker, ElInput, ElRadioButton, ElRadioGroup, ElSelect, ElOption } from "element-plus";

const props = defineProps({
    users: Object,
    default_assigned_to: Number,
    errors: Object,
});

const form = useForm({
    name: '',
    description: '',
    assigned_to: props.default_assigned_to,
});

function submit() {
    form.submit('post', '/projects');
}
</script>
