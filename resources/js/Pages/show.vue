<script setup>
    defineProps({customer:Object})
    import {router} from '@inertiajs/vue3';


    function customers() {
        router.get('/')
    }
</script>
<template>
           <div class="card col-8 offset-2 mt-3">
               <div class="card-header">
                   Customer Details
                   <button @click.prevent="customers()" class="btn btn-sm btn-info float-end">Back to previeous</button>
               </div>
                   <div class="card-body table-bordered">
                       <table class="table  table-bordered table-striped table-hover ">
                            <tr>
                                <th>Name</th>
                                <td>{{customer.name}}</td>
                            </tr>
                           <tr>
                               <th>Email</th>
                               <td>{{customer.email}}</td>
                           </tr>
                           <tr>
                               <th>Phone</th>
                               <td>{{customer.phone}}</td>
                           </tr>
                       </table>
                   </div>
           </div>
</template>
