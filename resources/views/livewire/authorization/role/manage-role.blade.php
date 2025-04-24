<div class="">
   <div class="mb-5">
            @if (session()->has('message'))
                  <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200 rounded-lg" />
            @endif
      </div>
   <div class="flex justify-between my-2 lg:my-2">
      <div>
         <x-wui-button @click="Livewire.dispatchTo('authorization.role.create-role', 'createRole')" type="submit" icon="plus-circle" primary label="New role"  class="bg-primary"/>
      </div>
      <div></div>
   </div>
   <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
   <livewire:datatable.datatable model="App\Models\Role" exclude="created_at,updated_at" paginate="5" /> 
   <livewire:authorization.role.create-role />
</div>
