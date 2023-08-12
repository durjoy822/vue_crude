<script setup>
    defineProps({customers:Object})
    import {router} from '@inertiajs/vue3';

    function destroy(id) {
        router.delete('/customers/'+id)
    }
    function edit(id) {
       router.get('/customers/'+id+'/edit')
    }
    function create() {
        router.get('/customer/create')
    }
    function show(id) {
        // alert(id);
        router.get('/customer/'+id+'/show')
    }
</script>

<template>
    <div class="card col-8 offset-2 mt-3">
        <div v-if="$page.props.flash.message" class="alert alert-success">
           <strong>{{$page.props.flash.message}}</strong>
        </div>
            <div class="card-header">
                Customer table
                <button @click.privent="create()" class="btn btn-outline-warning btn-sm float-end">Add Customer</button>
            </div>
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers">
                    <td>{{customer.id}}</td>
                    <td>{{customer.name}}</td>
                    <td>{{customer.email}}</td>
                    <td>{{customer.phone}}</td>
                    <td>
                        <button @click.prevent="show(customer.id)" class="btn btn-outline-info">View</button>
                        <button @click.prevent="edit(customer.id)" class="btn btn-outline-primary">Edit</button>
                        <button @click.prevent="destroy(customer.id)" class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
