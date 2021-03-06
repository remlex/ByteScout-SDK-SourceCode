//*******************************************************************
//       ByteScout PDF SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System;
using System.Diagnostics;
using Bytescout.PDF;

namespace FlattenFormExample
{
	/// <summary>
	/// This example demonstrates how to flatten a filled PDF form (make it uneditable).
	/// </summary>
	class Program
	{
		static void Main()
		{
			// Load filled PDF form
			Document pdfDocument = new Document(@"filled_form.pdf");
			pdfDocument.RegistrationName = "demo";
			pdfDocument.RegistrationKey = "demo";
			
			// Flatten the form
			pdfDocument.FlattenDocument();

			// Save modified document
			pdfDocument.Save("result.pdf");

			// Cleanup 
			pdfDocument.Dispose();

			// Open document in default PDF viewer app
			Process.Start("result.pdf");
		}
	}
}
