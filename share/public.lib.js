/**
 * Created by jiefzz on 6/18/15.
 */

/**
 * 获取url中的Get参数
 * @param name
 * @returns {*}
 */
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}