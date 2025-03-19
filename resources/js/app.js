import './bootstrap';

import {Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'
import humanDate from './directives/humanDate';


Alpine.directive('human-date', humanDate) //custom humanDate Directive // to update time on comment

Livewire.start()
