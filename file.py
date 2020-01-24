f = open("data", "r")
f2 = open("out", "w")
for x in f:
	print(x)
	L = x.split("#")
	no = L[0]
	name = L[1]
	phone = L[2]
	phone = phone.replace(" ", "")
	query = "insert into users(phone,name,confirmed) values('" + phone + " ','" + name + "',0);\n"
	f2.write(query)
	print(query)

