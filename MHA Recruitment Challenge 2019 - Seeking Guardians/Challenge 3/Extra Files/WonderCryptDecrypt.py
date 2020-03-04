import binascii

def a(stRing):
    #print list(bytearray(stRing))
    decode_B64 = binascii.a2b_base64(stRing)
    decode_array = bytearray(decode_B64)
    #print list(decode_array)
    for i in range(len(decode_array)):
        decode_array[i] = ((decode_array[i]-7)^193)%256
    #print list(decode_array)
    return str(decode_array)

txt_plain = "s7+0tbat"
lbl_msg1 = "uKe5ub2s"

a2 = a(txt_plain+lbl_msg1) #mylongpasswd
hexString = "deadbeef"
stR = hexString + "good"+"beef"
charSequence = "INPUT" ##input

s1 = a("mZCH8/r7/g==")
print s1
s2 = a("m5yO8wA=")
print s2
s3 = a("h4uZ")
print s3
s4 = a("m5yO8wA=")
print s4
s5 = a("h4uZ9YmKifWYkYmZ+5inrKyvtq0=")
print s5
s6 = a("nbW2rKu6ibq/uLw=")
print s6
s7 = a("k6u5uaetq+i5u6mpq7muu7S0v+irtqm6v7i8q6zn5w==")
print s7
s8 = a("lZE=")
print s8
