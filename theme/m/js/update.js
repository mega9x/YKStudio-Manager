/**
 * �ο��ĵ���http://ask.dcloud.net.cn/article/431
 * �����ļ�ΪJSON��ʽ���ݣ����£�
 * 
 * ������
 {
	"status":1,
	"version": "2.6.0",
	"title": "Hello MUI�汾����",
	"note": "�޸���ѡ�+����ˢ�¡�ʾ���У�ĳ��ѡ���������ʱ���ᴥ������ѡ����������¼���bug��\n�޸�Android4.4.4�汾�����ֻ��ϣ�����̵���ʱӰ��ͼƬ�ֲ�����������Զ��ֲ�ֹͣ��bug��",
	"url": "http://www.dcloud.io/hellomui/HelloMUI.apk"
}
*
* ��������
{"status":0}
 */
var server = "http://www.dcloud.io/check/update"; //��ȡ���������ļ���������ַ

function update() {
	mui.getJSON(server, {
		"appid": plus.runtime.appid,
		"version": plus.runtime.version,
		"imei": plus.device.imei
	}, function(data) {
		if (data.status) {
			plus.nativeUI.confirm(data.note, function(event) {
				if (0 == event.index) {
					plus.runtime.openURL(data.url);
				}
			}, data.title, ["��������", "ȡ������"]);
		}
	});
}

mui.os.plus && !mui.os.stream && mui.plusReady(update);
