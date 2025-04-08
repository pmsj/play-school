<div>
    <div class="flex justify-between my-2 lg:my-2">
        <div>
            <x-wui-button @click="Livewire.dispatchTo('authorization.role.create-role', 'createRole')" type="submit" icon="plus-circle" primary label="New user"  class="bg-primary"/>
        </div>
        <div></div>
    </div>
    <!-- in exclude prop, always pass comma seperated column names and there should not be any gap in between column names -->
   <livewire:datatable.datatable 
        model="App\Models\user" 
        exclude="password,two_factor_secret,two_factor_recovery_codes,two_factor_confirmed_at,remember_token,created_at,updated_at,email_verified_at,current_team_id,profile_photo_path" paginate="10" /> 
</div>
