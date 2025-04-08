<div class="">
   <div class="flex justify-between my-2 lg:my-2">
      <div>
         <x-wui-button @click="Livewire.dispatchTo('authorization.role.create-role', 'createRole')" type="submit" icon="plus-circle" primary label="New role"  class="bg-primary"/>
      </div>
      <div></div>
   </div>
   <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
   <livewire:datatable.datatable model="Spatie\Permission\Models\Role" exclude="created_at,updated_at" paginate="5" /> 
   <livewire:authorization.role.create-role />
</div>
