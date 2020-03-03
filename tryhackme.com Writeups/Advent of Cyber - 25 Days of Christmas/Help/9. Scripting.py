import requests

url = "http://10.10.112.87:3000/"
response = requests.get(url)
data = response.json()


flag =""

while data['next'] != "end":
	flag += data['value']
	url += data['next']
	response = requests.get(url)
	print(response.content)
	data = response.json()

print(flag)

