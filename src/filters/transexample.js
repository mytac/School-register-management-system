/**
 * Created by admin on 2016/8/31.
 */
export default function (attr_arr) {
    return value.toString().replace(/\B(?=(\d{3})+$)/g,',');
}