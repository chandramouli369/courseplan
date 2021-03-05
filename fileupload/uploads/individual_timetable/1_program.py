for k in range(1,7):

	file = open("input"+str(k)+".txt", "r")

	tot_books,tot_lib,tot_days=map(int, file.readline().split())
	scores = list(map(int, file.readline().split()))

	library = []

	for i in range(tot_lib):
		tmp = []
		lib = list(map(int, file.readline().split()))+[i]
		lib_book_index = list(map(int, file.readline().split()))
		tmp.append(lib)
		tmp.append(lib_book_index)
		library.append(tmp)
	# print (library)

	for i in range(tot_lib):
		for j in range(i+1,tot_lib):
			if (library[i][0][1]>library[j][0][1]):
				tmp = library[i]
				library[i] = library[j]
				library[j] = tmp
			elif(library[i][0][1]==library[j][0][1]):
				if (library[i][0][2]<library[j][0][2]):
					tmp = library[i]
					library[i] = library[j]
					library[j] = tmp
			# pass
	# print(library)


	# print (tot_books,tot_lib,tot_days)
	file = open("output"+str(k)+".txt", "w")
	file.write(str(tot_lib)+"\n")
	for i in range (0,tot_lib):
		file.write(str(library[i][0][3])+" "+str(len(library[i][1]))+"\n")
		str1= ""
		for j in range(len(library[i][1])):
			str1 += str(library[i][1][j])+" "
		file.write(str1+"\n")
