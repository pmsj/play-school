<div>
   <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
   <livewire:datatable.datatable model="Spatie\Permission\Models\Role" exclude="created_at,updated_at" paginate="5" /> 
   <livewire:authorization.role.create-role />
</div>
