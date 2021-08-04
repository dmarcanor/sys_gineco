import {uuid} from '@/Pages/Shared/helpers';

export default (method) => {
    return {
        id: method === 'POST' ? uuid() : '',
        nombre: '',
        archivo: ''
    }
}
