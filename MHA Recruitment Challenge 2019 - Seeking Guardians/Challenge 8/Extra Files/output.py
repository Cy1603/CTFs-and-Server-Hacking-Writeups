f1 = open("Hex Decrypted\\russia_decrypted.hex","r")
f2 = open("Hex Decrypted\\us_decrypted.hex","r")
f3 = open("Hex Decrypted\\china_decrypted.hex","r")
f4 = open("Hex Decrypted\\israel_decrypted.hex","r")

for line1 in f1:
    for line2 in f2:
        print(line1.rstrip('\n')+line2.rstrip('\n'))
        break

for line3 in f3:
    for line4 in f4:
        print(line3.rstrip('\n')+line4.rstrip('\n'))
        break


