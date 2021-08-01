import moment from "moment";

export default () =>{
    return {
        codigo: '',
        fecha_desde: '',
        fecha_hasta: moment().format('YYYY-MM-DDTHH:mm'),
        paciente_id: '',
    }
}
