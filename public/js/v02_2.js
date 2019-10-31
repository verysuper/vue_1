Vue.component('input-number',{
    template:`
        <div>
            <input type="text" :value="currentValue">
            <button @click="currentValue++">+</button>
            <button @click="currentValue--">-</button>
        </div>
    `,
    props:{
        value:{
            type:Number,
            default:0,
        },
    },
    data:function () {
        return {
            currentValue: this.value,
        }
    }
});
