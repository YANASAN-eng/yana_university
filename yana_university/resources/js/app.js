/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

// import StripeComponent from './components/StripeComponent.vue';
// app.component('stripe-component', StripeComponent);

import HomeComponent from './components/HomeComponent.vue';
app.component('home-component', HomeComponent);

import UserComponent from './components/addmin/UserComponent.vue';
app.component('user-component', UserComponent);

import ProductComponent from './components/addmin/ProductComponent.vue';
app.component('product-component', ProductComponent);

import ProductShowComponent from './components/user/ProductComponent.vue';
app.component('product-show-component', ProductShowComponent);

import ChatComponent from './components/ChatComponent.vue';
app.component('chat-component', ChatComponent);

import MapComponent from './components/map/main.vue';
app.component('map-component', MapComponent);

import LectureComponent from './components/addmin/LectureComponent.vue';
app.component('lecture-component', LectureComponent);

import FieldComponent from './components/addmin/FieldComponent.vue';
app.component('field-component', FieldComponent);

import ChapterComponent from './components/addmin/ChapterComponent.vue';
app.component('chapter-component', ChapterComponent);

import SectionComponent from './components/addmin/SectionComponent.vue';
app.component('section-component', SectionComponent);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
