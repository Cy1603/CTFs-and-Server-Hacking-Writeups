def sumChars(theString,indexStart,indexEnd,jump):
    local_10 = 0
    local_c = indexStart
    while local_c < indexEnd:
        local_10 = local_10 + theString[local_c]
        local_c = local_c + jump
    return local_10

def swapArr(tokenPart, pos1, pos2): 
    tokenPart[pos1], tokenPart[pos2] = tokenPart[pos2], tokenPart[pos1] 
    return tokenPart

pad = [0x77,0x3c,0x1e,0x6b,0x39,0x13,0x22,0x0f,0x24,0x02,0x73,0x59,0x67,0x64,0x21,0x73,0x17,0x1e,0x6d,0x5b,0x04,0x66,0x65,0x51,0x5b,0x43,0x57,0x27,0x0e,0x6a,0x0f,0x6d,0x2f,0x01,0x48,0x44,0x3b,0x48,0x5e,0x80,0x4e,0x1f,0x27,0x11,0x33,0x46,0x33,0x4a,0x25,0x5e,0x33,0x32,0x28,0x60,0x6e,0x00,0x06,0x1f,0x28,0x67,0x43,0x7d,0x57,0x32]
name = bytearray("Fresh Candidate")
email = bytearray("fresh_candidate@recruitment.com")
tokenPart = [2521,2000,5370,7265,5787,1425] #To obtain

##name and email modification steps
local_cc = 0
local_c8 = 0
local_88 = [email,name]
while local_c8 < 2:
    __s = local_88[local_c8]
    sVar3 = len(__s)
    iVar1 = sVar3
    if iVar1 < 0x20:
        local_c4 = 0
        while local_c4 < (0x20 - iVar1):
            __s.append(pad[local_c4 + local_cc])
            local_c4 = local_c4 + 1

        local_cc = 0x20 - iVar1
    local_c8 = local_c8 + 1
    
#print(name)
#print(email)

local_c0 = 0
while (local_c0 < 0x20):
  email[local_c0] = email[local_c0] ^ 5
  name[local_c0] = name[local_c0] ^ 0xf
  local_c0 = local_c0 + 1

#print(email)
#print(name)

##tokenPart modification steps
#print("Token change 1")
first1uVar2 = []
first1uVar4 = []
first2uVar2 = []
first2uVar4 = []
local_bc = 0
while local_bc < 6:
    uVar2 = sumChars(email,0,0x20,local_bc + 2)
    uVar4 = sumChars(email,local_bc + 1,0x20,local_bc + 2)
    first1uVar2.append(uVar2)
    first1uVar4.append(uVar4)
    tokenPart[local_bc] = tokenPart[local_bc] - (uVar2 * uVar4) % 10000
    uVar2 = sumChars(name,0,0x20,2)
    uVar4 = sumChars(name,1,0x20,2)
    first2uVar2.append(uVar2)
    first2uVar4.append(uVar4)
    tokenPart[local_bc] = (uVar2 - uVar4) * 4 + tokenPart[local_bc]
    local_bc = local_bc + 1

#print(tokenPart)

tokenPart = swapArr(tokenPart,3,4)
tokenPart = swapArr(tokenPart,2,5)
tokenPart = swapArr(tokenPart,1,5)
tokenPart = swapArr(tokenPart,2,3)
tokenPart = swapArr(tokenPart,0,5)
tokenPart = swapArr(tokenPart,4,5)

#print(tokenPart)

#print("Token change 2")
local_b8 = 0
second1uVar2=[]
second2uVar2=[]
while local_b8 < 6:
    uVar2 = sumChars(name,0,0x20,1)
    second1uVar2.append(uVar2)
    tokenPart[local_b8] = uVar2 + tokenPart[local_b8]
    uVar2 = sumChars(email,0,0x20,1)
    second2uVar2.append(uVar2)
    tokenPart[local_b8] = uVar2 + tokenPart[local_b8]
    local_b8 = local_b8 + 1

#print(tokenPart)

#print("Token change 3")
local_b4 = 0;
thirduVar2 = []
thirduVar4 = []
while local_b4 < 6:
    uVar2 = sumChars(email,local_b4 * 4,local_b4 * 4 + 1,1)
    uVar4 = sumChars(name,local_b4 * 4 + 2,local_b4 * 4 + 3,1)
    thirduVar2.append(uVar2)
    thirduVar4.append(uVar4)
    tokenPart[local_b4] = uVar2 % uVar4 + tokenPart[local_b4]
    local_b4 = local_b4 + 1

print("Using the access key below, tokenPartB:")
print(tokenPart)

##obtain findToken (Compared against modified tokenPart)
local_58 = [2,4,6,8,7,5]
local_38 = []
local_38.append(sumChars(email,0,10,1))
local_38.append(sumChars(email,10,0x19,1))
local_38.append(sumChars(email,0x19,0x20,1))
local_38.append(sumChars(name,0,0xd,1))
local_38.append(sumChars(name,0xd,0x14,1))
local_38.append( sumChars(name,0x14,0x20,1))
local_b0 = 0
while local_b0 < 6:
    local_38[local_b0] = (local_58[local_b0] * local_38[local_b0]) % 10000
    local_b0 = local_b0 + 1

findToken = local_38

print("findTokenB: ")
print(findToken)

#findToken = (modified)tokenPart
#Reverse tokenPart modification steps to get access key.
tokenPart = findToken
for i in range(5,-1,-1):
    tokenPart[i] = tokenPart[i] - thirduVar2[i] % thirduVar4[i]

#print(tokenPart)

for i in range(5,-1,-1):
    tokenPart[i] = tokenPart[i] - second2uVar2[i]
    tokenPart[i] = tokenPart[i] - second1uVar2[i]

#print(tokenPart)


tokenPart = swapArr(tokenPart,4,5)
tokenPart = swapArr(tokenPart,0,5)
tokenPart = swapArr(tokenPart,2,3)
tokenPart = swapArr(tokenPart,1,5)
tokenPart = swapArr(tokenPart,2,5)
tokenPart = swapArr(tokenPart,3,4)

#print(tokenPart)

for i in range(5,-1,-1):
    tokenPart[i] = tokenPart[i] - (first2uVar2[i] - first2uVar4[i]) * 4
    tokenPart[i] = tokenPart[i] + (first1uVar2[i] * first1uVar4[i]) % 10000

#print(tokenPart)
accesskey = ""
for part in tokenPart:
    accesskey+=str(part)
    accesskey+="-"
accesskey=accesskey[:-1]    
print("Access Key: "+accesskey)


