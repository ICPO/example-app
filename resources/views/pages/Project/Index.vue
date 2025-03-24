<script setup>
import { router } from '@inertiajs/vue3';
import { ElMessageBox, ElTable, ElTableColumn } from "element-plus";
import ProjectAlert from "./ProjectAlert.vue";

const props = defineProps({
    projects: Array,
    users: Object,
});

function deleteProject(id) {
    console.log('Начинаем удалять проект'); // (15)
    ElMessageBox.confirm(
        `Вы действительно хотите удалить проект «${id}»?`,
        'Подтверждение удаления', {
            confirmButtonText: 'Да',
            cancelButtonText: 'Нет',
            confirmButtonClass: 'g-button',
            cancelButtonClass: 'g-button outlined'
        }
    ).then(() => {
        router.delete(`/projects/${id}`);
    });

    // ElMessageBox.confirm( (16)
    //     `Вы действительно хотите удалить проект «${id}»?`,
    //     'Подтверждение удаления', {
    //         confirmButtonText: 'Да',
    //         cancelButtonText: 'Нет',
    //         confirmButtonClass: 'g-button',
    //         cancelButtonClass: 'g-button outlined'
    //     }
    // ).then(() => {
    //     router.delete(`/projects/${id}`);
    // });
}
</script>

<template>
    <Head title="Проекты" />

    <div class="g-titlebar">
        <h1>Проекты</h1>
        <Link href="/projects/create/" class="g-button outlined">Создать проект</Link>
    </div>

    <div class="g-alert">Список проектов</div>
    <project-alert>Список проектов</project-alert>

    <el-table :data="projects" table-layout="auto">
        <el-table-column label="Название" prop="name" />
        <el-table-column label="Описание" prop="description" />
        <el-table-column label="Ответственный" align="center">
            <template #default="{ row }">
                {{ users[row.assigned_to] }}
            </template>
        </el-table-column>
        <el-table-column align="right">
            <template #default="{ row }">
                <a @click="deleteProject(row.id)" title="Удалить" class="g-actionicon">
                    <font-awesome-icon icon="trash" />
                </a>
                <Link :href="`/projects/${row.id}/edit/`" class="g-actionicon">
                    <font-awesome-icon icon="pen-to-square" />
                </Link>
            </template>
        </el-table-column>
    </el-table>
</template>

<style scoped lang="scss">
// (11)
.g-alert { // (12)
    background: #acacdf; // (13)
}
</style>