<template>
    <Head><title>Редактирование проекта</title></Head>

    <div class="g-titlebar">
        <h1>Редактирование проекта</h1>
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
            <button class="g-button">Сохранить изменения</button>
        </b-formrow>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import BFormrow from "../../blocks/BFormrow.vue";
import {  ElInput, ElSelect, ElOption } from "element-plus";

const props = defineProps({
    initialValues: Object,
    users: Object,
    errors: Object,
});

const form = useForm(props.initialValues);

function submit() {
    form.submit('put', `/projects/${props.initialValues.id}`);
}
</script>
